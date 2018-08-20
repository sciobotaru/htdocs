using System;
using System.IO;
using System.Text.RegularExpressions;

namespace DB_Migrator
{
    class XmlParent
    {
        /// <summary>
        /// The file (path + file name) to read from and write to
        /// </summary>
        public string FullPath { get; set; }

        protected string beforePattern;
        protected string editableAreaPattern;
        protected string afterPattern;
        protected string allText;

        public string GetEditableArea()
        {
            try
            {
                allText = File.ReadAllText(FullPath);
                return Match(allText, editableAreaPattern);

            }
            catch (Exception ex)
            {
                return ex.Message;
            }
        }

        /// <summary>
        /// Get the text before the editable area
        /// </summary>
        /// <returns></returns>
        public string GetBeforeEditableArea()
        {
            if (string.IsNullOrEmpty(allText)) throw new Exception("Error: call GetEditableArea() function first");

            return Match(allText, beforePattern);
        }

        /// <summary>
        /// Gets the text after the editable area
        /// </summary>
        /// <returns></returns>
        public string GetAfterEditableArea()
        {
            if (string.IsNullOrEmpty(allText)) throw new Exception("Error: call GetEditableArea() function first");

            return Match(allText, afterPattern);
        }

        /// <summary>
        /// Save the content to file
        /// </summary>
        /// <param name="contents">The string to write to file</param>
        public void Save(string contents)
        {
            File.WriteAllText(FullPath, contents);
        }

        private string Match(string input, string pattern)
        {
            Match match = Regex.Match(input, pattern);
            if (match.Success)
            {
                return match.Groups[1].Value;
            }
            else
            {
                return "ERROR: Regex pattern (" + pattern + ") did not match input text.";
            }
        }
    }
}
