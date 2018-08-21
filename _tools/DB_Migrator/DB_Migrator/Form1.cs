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
    public partial class DBMigrator : Form
    {
        private DBContext db;
        private Xml xml;
        private XmlToDbMapper xmlToDb;
        List<string> initialDbColumns;

        public DBMigrator()
        {
            InitializeComponent();
            db = new DBContext();
            xml = new Xml();
            xmlToDb = new XmlToDbMapper();
        }

        private void bReadFiles_Click(object sender, EventArgs e)
        {
            db.OpenConnection();
            rtbColumnsOld.Text = string.Empty;
            initialDbColumns = db.GetColumns("all_discounted_products");
            foreach (var col in initialDbColumns)
            {
                rtbColumnsOld.Text += col + "\n";
            }
            db.CloseConnection();

            rtbXml.Text = xml.GetEditableArea();
            rtbXmlToDB.Text = xmlToDb.GetEditableArea();
        }

        private void bUpdate_Click(object sender, EventArgs e)
        {
            if (initialDbColumns == null) MessageBox.Show("Error: please read files first");
            lLoggerDB.Text = string.Empty;
            //1. Get modified (or not) columns 
            List<string> modifiedDbColumns = rtbColumnsOld.Text.Split('\n').ToList().Where(s => !string.IsNullOrEmpty(s)).ToList();
            modifiedDbColumns.Sort();
            initialDbColumns.Sort();

            if (modifiedDbColumns.SequenceEqual(initialDbColumns))
            {
                lLoggerDB.Text = "No column has been modified";
            }

            //2. Check if elements has been added
            List<string> added = modifiedDbColumns.Except(initialDbColumns).ToList();

            //3. Check if elements has been deleted
            List<string> deleted = initialDbColumns.Except(modifiedDbColumns).ToList();

            //4. Get the lists of real added, modified and deleted columns
            string realAdded = string.Empty;
            string realDeleted = string.Empty;
            string oldValue = string.Empty;
            string newValue = string.Empty;
            //set real values
            if (added.Count == 1 && deleted.Count == 1)
            {
                oldValue = deleted[0];
                newValue = added[0];
            }
            else
            if (added.Count == 1 && deleted.Count == 0)
            {
                realAdded = added[0];
            }
            else
            if (added.Count == 0 && deleted.Count == 1)
            {
                realDeleted = deleted[0];
            }
            else
            {
                MessageBox.Show("Error: there are too many changes into DB. Please make only ONE change and update.");
            }
            //display the values
            if (oldValue != string.Empty && newValue != string.Empty)
            {
                lLoggerDB.Text += "Modified: Old -> " + oldValue + "; New -> " + newValue + "; ";

            }
            else
            if (realAdded != string.Empty)
            {
                lLoggerDB.Text = "Added: " + realAdded + "; ";
            }
            else
            if (realDeleted != string.Empty)
            {
                lLoggerDB.Text += "Deleted: " + realDeleted + "; ";
            }
            //db.OpenConnection();
            ////db.Add("all_discounted_products", "xxx", true, 100, false);
            //int noColumns = db.Remove("all_discounted_products", "xxx");
            //lLoggerDB.Text = noColumns + " lines affected.";
            //db.CloseConnection();
        }
    }
}
