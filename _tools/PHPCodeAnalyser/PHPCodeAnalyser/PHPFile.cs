using System.Collections.Generic;

namespace PHPCodeAnalyser
{
    class PHPFile
    {
        public string FileName = string.Empty;
        public List<string> DefinedFunctions = new List<string>();
        public List<string> CalledFunctions = new List<string>();

        public List<string> DependsOnFiles = new List<string>();

        public List<string> GlobalDefinedVariables = new List<string>();
        public List<string> UsedVariables = new List<string>();

        public override string ToString()
        {
            string definedFunctions = "Defined functions:\n";
            if (DefinedFunctions.Count == 0)
            {
                definedFunctions += "None";
            }
            else
            {
                foreach (var df in DefinedFunctions)
                {
                    definedFunctions += df + "; ";
                }
            }

            //===

            string calledFunctions = "Called functions:\n";
            if (CalledFunctions.Count == 0)
            {
                calledFunctions += "None";
            }
            else
            {
                foreach (var df in CalledFunctions)
                {
                    calledFunctions += df + "; ";
                }
            }

            //===

            string dependsOnFiles = "Depends of files:\n";
            if (DependsOnFiles.Count == 0)
            {
                dependsOnFiles += "None";
            }
            else
            {
                foreach (var df in DependsOnFiles)
                {
                    dependsOnFiles += df + "; ";
                }
            }

            //====

            string globalDefinedVariables = "Global defined variables:\n";
            if (GlobalDefinedVariables.Count == 0)
            {
                globalDefinedVariables += "None";
            }
            else
            {
                foreach (var df in GlobalDefinedVariables)
                {
                    globalDefinedVariables += df + "; ";
                }
            }

            //====

            string usedVariables = "Used variables:\n";
            if (UsedVariables.Count == 0)
            {
                usedVariables += "None";
            }
            else
            {
                foreach (var df in UsedVariables)
                {
                    usedVariables += df + "; ";
                }
            }

            return "------------------------------------------------------------------------\n" +
                   FileName + "\n" +
                   "------------------------------------------------------------------------\n" +
                   definedFunctions + "\n\n" +
                   calledFunctions + "\n\n" +
                   dependsOnFiles + "\n\n" +
                   globalDefinedVariables + "\n\n" +
                   usedVariables + "\n";
        }
    }
}
