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
        public void DBConnect()
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
            database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";";

            connection = new MySqlConnection(connectionString);
        }

        //open connection to database
        private bool OpenConnection()
        {
            connection.Open();
            if (connection.State == System.Data.ConnectionState.Open)
                return true;
            else
                return false;
        }

        //Close connection
        private bool CloseConnection()
        {
            connection.Close();
            if (connection.State == System.Data.ConnectionState.Closed)
                return true;
            else
                return false;
        }

        //Insert statement
        //insert int: ALTER TABLE `all_valid_products` ADD `InsertInt` INT(8) UNSIGNED NULL DEFAULT NULL ;
        //returns number of rows affected
        public int Add(string table, string column, bool isString, int stringLenght, bool isInt)
        {
            if (isInt)
            {
                string addString = "ALTER TABLE `" + table + "` ADD `" + column + "` INT(8) UNSIGNED NULL DEFAULT NULL;";
                using (MySqlCommand command = new MySqlCommand(addString, connection))
                {
                    return command.ExecuteNonQuery();
                }
            }
            else
            {
                string addString = "ALTER TABLE `" + table + "` ADD `" + column + "` VARCHAR(" + stringLenght + ") NULL DEFAULT NULL ;";
                using (MySqlCommand command = new MySqlCommand(addString, connection))
                {
                    return command.ExecuteNonQuery();
                }
            }
        }

        //Update statement
        //modify: ALTER TABLE `all_valid_products` CHANGE `LinkYoutube` `LinkYoutubee` VARCHAR(300) CHARACTER SET latin1 COLLATE latin1_general_ci NULL DEFAULT NULL;
        public void Update()
        {

        }

        //Delete statement
        //delete: "ALTER TABLE `all_valid_products` DROP `LinkYoutube`;"
        public void Delete()
        {
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
