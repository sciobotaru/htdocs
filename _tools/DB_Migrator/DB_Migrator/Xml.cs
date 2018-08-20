using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;

namespace DB_Migrator
{
    class Xml : XmlParent
    {
        public Xml()
        {
            beforePattern = "(?s)(.*#region public serializable properties)";
            editableAreaPattern = "#region public serializable properties(?s)(.*?)#endregion";
            afterPattern = "(?s)(#endregion.*)";
            FullPath = @"D:\Dropbox\MyProjects\ElectroDeals\ReduceriPeBune\DiscountFinderWorkspace\Apps\DiscountFinder\DataStructure\Product.cs";
        }
    }
}
