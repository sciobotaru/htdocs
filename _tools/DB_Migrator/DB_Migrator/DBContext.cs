using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data;
using MySql.Data.MySqlClient;

namespace DB_Migrator
{
    class DBContext
    {
        private MySqlConnection connection;
        private string server;
        private string database;
        private string uid;
        private string password;
        private bool production;

        //Constructor
        public DBContext()
        {
            Initialize();
            production = false;
        }

        //Initialize values
        private void Initialize()
        {
            server = "localhost";
            database = "asigurat_electrodeals";
            if (production)
            {
                uid = "asigurat_electro";
                password = "Electro2018";
            }
            else
            {
                uid = "root";
                password = "ciobotaru101010";
            }
            string connectionString;
            connectionString = "SERVER=" + server + ";" + "DATABASE=" +
            database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";SslMode=none";

            connection = new MySqlConnection(connectionString);
        }

        //open connection to database
        public bool OpenConnection()
        {
            connection.Open();
            if (connection.State == ConnectionState.Open)
                return true;
            else
                return false;
        }

        //Close connection
        public bool CloseConnection()
        {
            connection.Close();
            if (connection.State == ConnectionState.Closed)
                return true;
            else
                return false;
        }

        //Insert statement
        //insert int: ALTER TABLE `all_valid_products` ADD `InsertInt` INT(8) UNSIGNED NULL DEFAULT NULL ;
        //ALTER TABLE `all_discounted_products` ADD `Booll` BOOLEAN NULL DEFAULT NULL AFTER `LinkYoutube`;
        //returns number of rows affected
        public int Add(string table, string column, bool isString, int stringLenght, bool isInt, bool isBool)
        {
            if (isInt)
            {
                string addString = "ALTER TABLE `" + table + "` ADD `" + column + "` INT(8) UNSIGNED NULL DEFAULT NULL;";
                using (MySqlCommand command = new MySqlCommand(addString, connection))
                {
                    return command.ExecuteNonQuery();
                }
            }
            else if (isString)
            {
                string addString = "ALTER TABLE `" + table + "` ADD `" + column + "` VARCHAR(" + stringLenght + ") NULL DEFAULT NULL ;";
                using (MySqlCommand command = new MySqlCommand(addString, connection))
                {
                    return command.ExecuteNonQuery();
                }
            }
            else
            {
                string addString = "ALTER TABLE `" + table + "` ADD `" + column + "` BOOLEAN NULL DEFAULT NULL;";
                using (MySqlCommand command = new MySqlCommand(addString, connection))
                {
                    return command.ExecuteNonQuery();
                }
            }
        }

        //Update statement
        //modify: ALTER TABLE `all_valid_products` CHANGE `LinkYoutube` `LinkYoutubee`;
        public int Update(string table, string oldName, string newName)
        {
            string addString = "ALTER TABLE `" + table + "` CHANGE `" + oldName + "` `" + newName + "` VARCHAR(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;";
            using (MySqlCommand command = new MySqlCommand(addString, connection))
            {
                try
                {
                    return command.ExecuteNonQuery();
                }
                catch { return 0; }
            }
        }

        //Delete statement
        //delete: "ALTER TABLE `all_valid_products` DROP `LinkYoutube`;"
        public int Remove(string table, string column)
        {
            string addString = "ALTER TABLE `" + table + "` DROP `" + column + "`;";
            using (MySqlCommand command = new MySqlCommand(addString, connection))
            {
                try
                {
                    return command.ExecuteNonQuery();
                }
                catch { return 0; }
            }
        }

        //Select statement
        //SHOW COLUMNS FROM your-table
        public List<string> GetColumns(string table)
        {
            List<string> result = new List<string>();
            DataTable schema = null;
            using (var schemaCommand = new MySqlCommand("SELECT * FROM " + table, connection))
            {
                using (var reader = schemaCommand.ExecuteReader(CommandBehavior.SchemaOnly))
                {
                    schema = reader.GetSchemaTable();
                }
            }
            foreach (DataRow col in schema.Rows)
            {
                result.Add(col.Field<String>("ColumnName"));
            }
            return result;
        }

        //Count statement
        public int Count()
        {
            return 0;
        }

        //Backup
        public void Backup()
        {
        }

        //Restore
        public void Restore()
        {
        }
    }
}
