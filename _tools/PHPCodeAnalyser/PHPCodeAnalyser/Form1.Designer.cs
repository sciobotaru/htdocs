namespace PHPCodeAnalyser
{
    partial class Form1
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
            this.bBrowseProject = new System.Windows.Forms.Button();
            this.bRunAnalysis = new System.Windows.Forms.Button();
            this.lFolderSelected = new System.Windows.Forms.Label();
            this.richTextBox1 = new System.Windows.Forms.RichTextBox();
            this.SuspendLayout();
            // 
            // bBrowseProject
            // 
            this.bBrowseProject.Location = new System.Drawing.Point(12, 12);
            this.bBrowseProject.Name = "bBrowseProject";
            this.bBrowseProject.Size = new System.Drawing.Size(157, 29);
            this.bBrowseProject.TabIndex = 0;
            this.bBrowseProject.Text = "Browse Project";
            this.bBrowseProject.UseVisualStyleBackColor = true;
            this.bBrowseProject.Click += new System.EventHandler(this.bBrowseProject_Click);
            // 
            // bRunAnalysis
            // 
            this.bRunAnalysis.Location = new System.Drawing.Point(12, 68);
            this.bRunAnalysis.Name = "bRunAnalysis";
            this.bRunAnalysis.Size = new System.Drawing.Size(220, 46);
            this.bRunAnalysis.TabIndex = 1;
            this.bRunAnalysis.Text = "Run Analysis";
            this.bRunAnalysis.UseVisualStyleBackColor = true;
            this.bRunAnalysis.Click += new System.EventHandler(this.bRunAnalysis_Click);
            // 
            // lFolderSelected
            // 
            this.lFolderSelected.AutoSize = true;
            this.lFolderSelected.Location = new System.Drawing.Point(185, 19);
            this.lFolderSelected.Name = "lFolderSelected";
            this.lFolderSelected.Size = new System.Drawing.Size(363, 17);
            this.lFolderSelected.TabIndex = 2;
            this.lFolderSelected.Text = "No folder selected (ex.: C:\\Apache24\\htdocs\\assets\\php)";
            // 
            // richTextBox1
            // 
            this.richTextBox1.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.richTextBox1.Location = new System.Drawing.Point(12, 139);
            this.richTextBox1.Name = "richTextBox1";
            this.richTextBox1.Size = new System.Drawing.Size(1162, 510);
            this.richTextBox1.TabIndex = 3;
            this.richTextBox1.Text = "";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1186, 661);
            this.Controls.Add(this.richTextBox1);
            this.Controls.Add(this.lFolderSelected);
            this.Controls.Add(this.bRunAnalysis);
            this.Controls.Add(this.bBrowseProject);
            this.Name = "Form1";
            this.Text = "Form1";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button bBrowseProject;
        private System.Windows.Forms.Button bRunAnalysis;
        private System.Windows.Forms.Label lFolderSelected;
        private System.Windows.Forms.RichTextBox richTextBox1;
    }
}

