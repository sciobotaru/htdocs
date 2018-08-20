using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

//Purpose: modify the Database, Xml, and xmlToDatabase writer
//To modify the DB -> read db columns and excute queries (delete && insert && modify)
//modify: ALTER TABLE `all_valid_products` CHANGE `LinkYoutube` `LinkYoutubee` VARCHAR(300) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL;
//delete: "ALTER TABLE `all_valid_products` DROP `LinkYoutube`;"
//insert int: ALTER TABLE `all_valid_products` ADD `InsertInt` INT(8) UNSIGNED NULL DEFAULT NULL ;
//insert string: ALTER TABLE `all_valid_products` ADD `InsertString` VARCHAR(200) NULL DEFAULT NULL ;
//To modify the Xml structure -> modify Product.cs (from D:\Dropbox\MyProjects\ElectroDeals\ReduceriPeBune\DiscountFinderWorkspace\Apps\DiscountFinder\DataStructure\) => simply read the file and overrite it after modifications
//To modify the Xml to Database writer -> modify dbconnector.php (from: C:\Apache24\htdocs\assets\php\db) => simply read the file and overrite it after modifications

namespace DB_Migrator
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
    }
}
