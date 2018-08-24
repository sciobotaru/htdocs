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
            bUpdate.Enabled = false;
        }

        private void bReadFiles_Click(object sender, EventArgs e)
        {
            bUpdate.Enabled = true;
            lLoggerDB.Text = "Logger";
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
            #region database (phpmysql)
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
            else
            {

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
                //modify the database
                if (oldValue != string.Empty && newValue != string.Empty) // => update (change column name)
                {
                    lLoggerDB.Text += "Modified: Old -> " + oldValue + "; New -> " + newValue + "; ";
                    db.OpenConnection();
                    int lines = db.Update("all_discounted_products", oldValue, newValue);
                    MessageBox.Show("Go to myphpadmin and adjust the type of the column (currently is char(300))");
                    db.CloseConnection();
                }
                else
                if (realAdded != string.Empty) // => add column
                {
                    lLoggerDB.Text = "Added: " + realAdded + "; ";
                    db.OpenConnection();
                    if (cbAddStr.Checked == true)
                    {
                        db.Add("all_discounted_products", realAdded, true, 200, false, false);
                        lLoggerDB.Text += "The column is of type string.";
                    }
                    else
                        if (cbAddInt.Checked == true)
                    {
                        db.Add("all_discounted_products", realAdded, false, 0, true, false);
                        lLoggerDB.Text += "The column is of type string.";
                    }
                    else
                        if (cbAddBool.Checked == true)
                    {
                        db.Add("all_discounted_products", realAdded, false, 200, false, true);
                        lLoggerDB.Text += "The column is of type string.";
                    }
                    db.CloseConnection();
                }
                else
                if (realDeleted != string.Empty)
                {
                    lLoggerDB.Text += "Deleted: " + realDeleted + "; ";
                    db.OpenConnection();
                    db.Remove("all_discounted_products", realDeleted);
                    db.CloseConnection();
                }
            }
            #endregion

            #region xml (Product.cs)
            string result = string.Empty;
            result += xml.GetBeforeEditableArea();
            result += rtbXml.Text;
            result += xml.GetAfterEditableArea();
            xml.Save(result);
            #endregion

            #region xmlToDB (dbconnector.php)
            string text = string.Empty;
            text += xmlToDb.GetBeforeEditableArea();
            text += rtbXmlToDB.Text;
            text += xmlToDb.GetAfterEditableArea();
            xmlToDb.Save(text);
            #endregion

            bUpdate.Enabled = false;
        }
    }
}
