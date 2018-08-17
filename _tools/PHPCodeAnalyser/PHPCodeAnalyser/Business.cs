using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text.RegularExpressions;

namespace PHPCodeAnalyser
{
    /// <summary>
    /// Create a list of PHPFile objects and create php structure and the report
    /// </summary>
    class Business
    {
        private List<PHPFile> PHPFiles = new List<PHPFile>();

        private string patternDefinedFunctions = @"function\s+(\w+)";
        private string patternCalledFunctions = @"(\w+)\(.*\)"; //if line does not contain "function"
        private string patternDependsOnFiles = @"(\w+\.php)"; //if line contains "include"
        private string patternGlobalDefinedVariables = @"(\$\w+)"; //while !line.Contains("function")
        private string patternUsedVariables = @"global\s+(\$\w+)"; //remove duplicates

        public string GetStructure(List<string> phpFiles)
        {
            if (phpFiles == null) return string.Empty;

            string finalresult = "";

            foreach(string pathToFile in phpFiles)
            {
                PHPFile phpfile = new PHPFile();
                bool functionWordDetected = false;

                phpfile.FileName = Path.GetFileName(pathToFile);

                foreach (string line in File.ReadAllLines(pathToFile))
                {
                    if (line.Contains("function")) functionWordDetected = true;

                    //defined functions
                    string result = MatchPattern(line, patternDefinedFunctions);
                    if (result != string.Empty)
                    {
                        phpfile.DefinedFunctions.Add(result);
                    }
                    //called functions
                    if(!line.Contains("function"))
                    {
                        result = MatchPattern(line, patternCalledFunctions);
                        if (result.Length > 5 && result != "foreach" && result != "elseif")
                        {
                            phpfile.CalledFunctions.Add(result);
                        }
                    }
                    //file dependencies
                    if (line.Contains("include"))
                    {
                        result = MatchPattern(line, patternDependsOnFiles);
                        if (result != string.Empty)
                        {
                            phpfile.DependsOnFiles.Add(result);
                        }
                    }
                    //defined variables
                    if(!functionWordDetected)
                    {
                        result = MatchPattern(line, patternGlobalDefinedVariables);
                        if (result != string.Empty)
                        {
                            phpfile.GlobalDefinedVariables.Add(result);
                        }
                    }
                    //used variables
                    result = MatchPattern(line, patternUsedVariables);
                    if (result != string.Empty)
                    {
                        phpfile.UsedVariables.Add(result);
                    }
                }
                phpfile.UsedVariables = phpfile.UsedVariables.Distinct().ToList();

                finalresult += phpfile + "\n###############################################################\n\n\n";

                PHPFiles.Add(phpfile);
            }
            return finalresult;
        }

        public string GetReport()
        {
            string result = "Unused functions (that are defined but never called -> don't forget to copy index.php in the analized folder for accurate results):\n";
            List<string> definedFunctions = new List<string>();
            List<string> calledFunctions = new List<string>();

            foreach(PHPFile php in PHPFiles)
            {
                definedFunctions.AddRange(php.DefinedFunctions);
                calledFunctions.AddRange(php.CalledFunctions);
            }

            definedFunctions = definedFunctions.Distinct().ToList();
            calledFunctions = calledFunctions.Distinct().ToList();

            List<string> unusedFunctions = definedFunctions.Except(calledFunctions).ToList();

            foreach(string unused in unusedFunctions)
            {
                result += unused + "; ";
            }

            return result;
        }

        private string MatchPattern(string input, string pattern)
        {
            Match reg = Regex.Match(input, pattern);
            if (reg.Success)
            {
                return reg.Groups[1].Value;
            }
            else
                return string.Empty;
        }
    }
}
