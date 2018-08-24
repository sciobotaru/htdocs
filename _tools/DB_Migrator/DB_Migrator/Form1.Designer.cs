namespace DB_Migrator
{
    partial class DBMigrator
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(DBMigrator));
            this.bReadFiles = new System.Windows.Forms.Button();
            this.rtbColumnsOld = new System.Windows.Forms.RichTextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.bUpdate = new System.Windows.Forms.Button();
            this.rtbXml = new System.Windows.Forms.RichTextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.lLoggerDB = new System.Windows.Forms.Label();
            this.rtbXmlToDB = new System.Windows.Forms.RichTextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.lLoggerProductcs = new System.Windows.Forms.Label();
            this.lLoggerDbconnector = new System.Windows.Forms.Label();
            this.cbAddStr = new System.Windows.Forms.CheckBox();
            this.cbAddInt = new System.Windows.Forms.CheckBox();
            this.cbAddBool = new System.Windows.Forms.CheckBox();
            this.label5 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // bReadFiles
            // 
            this.bReadFiles.Location = new System.Drawing.Point(16, 15);
            this.bReadFiles.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.bReadFiles.Name = "bReadFiles";
            this.bReadFiles.Size = new System.Drawing.Size(225, 63);
            this.bReadFiles.TabIndex = 0;
            this.bReadFiles.Text = "Read files";
            this.bReadFiles.UseVisualStyleBackColor = true;
            this.bReadFiles.Click += new System.EventHandler(this.bReadFiles_Click);
            // 
            // rtbColumnsOld
            // 
            this.rtbColumnsOld.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left)));
            this.rtbColumnsOld.Location = new System.Drawing.Point(16, 105);
            this.rtbColumnsOld.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.rtbColumnsOld.Name = "rtbColumnsOld";
            this.rtbColumnsOld.Size = new System.Drawing.Size(243, 325);
            this.rtbColumnsOld.TabIndex = 1;
            this.rtbColumnsOld.Text = "";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(20, 84);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(146, 17);
            this.label1.TabIndex = 2;
            this.label1.Text = "Columns in Database:";
            // 
            // bUpdate
            // 
            this.bUpdate.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.bUpdate.Location = new System.Drawing.Point(16, 473);
            this.bUpdate.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.bUpdate.Name = "bUpdate";
            this.bUpdate.Size = new System.Drawing.Size(225, 54);
            this.bUpdate.TabIndex = 4;
            this.bUpdate.Text = "Update";
            this.bUpdate.UseVisualStyleBackColor = true;
            this.bUpdate.Click += new System.EventHandler(this.bUpdate_Click);
            // 
            // rtbXml
            // 
            this.rtbXml.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.rtbXml.Location = new System.Drawing.Point(268, 58);
            this.rtbXml.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.rtbXml.Name = "rtbXml";
            this.rtbXml.Size = new System.Drawing.Size(411, 438);
            this.rtbXml.TabIndex = 5;
            this.rtbXml.Text = "";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(264, 38);
            this.label2.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(173, 17);
            this.label2.TabIndex = 6;
            this.label2.Text = "Product.cs (xml structure):";
            // 
            // lLoggerDB
            // 
            this.lLoggerDB.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.lLoggerDB.AutoSize = true;
            this.lLoggerDB.Location = new System.Drawing.Point(20, 530);
            this.lLoggerDB.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.lLoggerDB.Name = "lLoggerDB";
            this.lLoggerDB.Size = new System.Drawing.Size(53, 17);
            this.lLoggerDB.TabIndex = 7;
            this.lLoggerDB.Text = "Logger";
            // 
            // rtbXmlToDB
            // 
            this.rtbXmlToDB.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.rtbXmlToDB.Location = new System.Drawing.Point(688, 58);
            this.rtbXmlToDB.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.rtbXmlToDB.Name = "rtbXmlToDB";
            this.rtbXmlToDB.Size = new System.Drawing.Size(507, 457);
            this.rtbXmlToDB.TabIndex = 8;
            this.rtbXmlToDB.Text = "";
            // 
            // label3
            // 
            this.label3.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(687, 38);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(241, 17);
            this.label3.TabIndex = 9;
            this.label3.Text = "dbconnector.php (xml to db mapper):";
            // 
            // lLoggerProductcs
            // 
            this.lLoggerProductcs.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.lLoggerProductcs.AutoSize = true;
            this.lLoggerProductcs.Location = new System.Drawing.Point(271, 503);
            this.lLoggerProductcs.Name = "lLoggerProductcs";
            this.lLoggerProductcs.Size = new System.Drawing.Size(53, 17);
            this.lLoggerProductcs.TabIndex = 10;
            this.lLoggerProductcs.Text = "Logger";
            // 
            // lLoggerDbconnector
            // 
            this.lLoggerDbconnector.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.lLoggerDbconnector.AutoSize = true;
            this.lLoggerDbconnector.Location = new System.Drawing.Point(692, 521);
            this.lLoggerDbconnector.Name = "lLoggerDbconnector";
            this.lLoggerDbconnector.Size = new System.Drawing.Size(53, 17);
            this.lLoggerDbconnector.TabIndex = 11;
            this.lLoggerDbconnector.Text = "Logger";
            // 
            // cbAddStr
            // 
            this.cbAddStr.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.cbAddStr.AutoSize = true;
            this.cbAddStr.Checked = true;
            this.cbAddStr.CheckState = System.Windows.Forms.CheckState.Checked;
            this.cbAddStr.Location = new System.Drawing.Point(60, 444);
            this.cbAddStr.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.cbAddStr.Name = "cbAddStr";
            this.cbAddStr.Size = new System.Drawing.Size(46, 21);
            this.cbAddStr.TabIndex = 12;
            this.cbAddStr.Text = "str";
            this.cbAddStr.UseVisualStyleBackColor = true;
            // 
            // cbAddInt
            // 
            this.cbAddInt.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.cbAddInt.AutoSize = true;
            this.cbAddInt.Location = new System.Drawing.Point(112, 444);
            this.cbAddInt.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.cbAddInt.Name = "cbAddInt";
            this.cbAddInt.Size = new System.Drawing.Size(45, 21);
            this.cbAddInt.TabIndex = 13;
            this.cbAddInt.Text = "int";
            this.cbAddInt.UseVisualStyleBackColor = true;
            // 
            // cbAddBool
            // 
            this.cbAddBool.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.cbAddBool.AutoSize = true;
            this.cbAddBool.Location = new System.Drawing.Point(159, 444);
            this.cbAddBool.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.cbAddBool.Name = "cbAddBool";
            this.cbAddBool.Size = new System.Drawing.Size(57, 21);
            this.cbAddBool.TabIndex = 14;
            this.cbAddBool.Text = "bool";
            this.cbAddBool.UseVisualStyleBackColor = true;
            // 
            // label5
            // 
            this.label5.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(16, 444);
            this.label5.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(37, 17);
            this.label5.TabIndex = 16;
            this.label5.Text = "Add:";
            // 
            // DBMigrator
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1212, 554);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.cbAddBool);
            this.Controls.Add(this.cbAddInt);
            this.Controls.Add(this.cbAddStr);
            this.Controls.Add(this.lLoggerDbconnector);
            this.Controls.Add(this.lLoggerProductcs);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.rtbXmlToDB);
            this.Controls.Add(this.lLoggerDB);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.rtbXml);
            this.Controls.Add(this.bUpdate);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.rtbColumnsOld);
            this.Controls.Add(this.bReadFiles);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.Name = "DBMigrator";
            this.Text = "Database Migrator";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button bReadFiles;
        private System.Windows.Forms.RichTextBox rtbColumnsOld;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button bUpdate;
        private System.Windows.Forms.RichTextBox rtbXml;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label lLoggerDB;
        private System.Windows.Forms.RichTextBox rtbXmlToDB;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label lLoggerProductcs;
        private System.Windows.Forms.Label lLoggerDbconnector;
        private System.Windows.Forms.CheckBox cbAddStr;
        private System.Windows.Forms.CheckBox cbAddInt;
        private System.Windows.Forms.CheckBox cbAddBool;
        private System.Windows.Forms.Label label5;
    }
}

