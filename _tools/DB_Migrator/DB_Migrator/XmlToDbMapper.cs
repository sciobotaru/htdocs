using System;
using System.IO;
using System.Text.RegularExpressions;

namespace DB_Migrator
{
    class XmlToDbMapper: XmlParent
    {
        public XmlToDbMapper()
        {
            beforePattern = "(?s)(.*?)function writeXmlToDatabase";
            editableAreaPattern = @"(?s)(function writeXmlToDatabase.*?)\/\/end function";
            afterPattern = @"(?s)(\/\/end function writeXmlToDatabase.*)";
            FullPath = @"C:\Apache24\htdocs\assets\php\db\dbconnector.php";
        }
    }
}
