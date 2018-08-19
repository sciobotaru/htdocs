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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            this.bBrowseProject = new System.Windows.Forms.Button();
            this.bRunAnalysis = new System.Windows.Forms.Button();
            this.lFolderSelected = new System.Windows.Forms.Label();
            this.richTextBox1 = new System.Windows.Forms.RichTextBox();
            this.SuspendLayout();
            // 
            // bBrowseProject
            // 
            this.bBrowseProject.Location = new System.Drawing.Point(9, 10);
            this.bBrowseProject.Margin = new System.Windows.Forms.Padding(2, 2, 2, 2);
            this.bBrowseProject.Name = "bBrowseProject";
            this.bBrowseProject.Size = new System.Drawing.Size(118, 24);
            this.bBrowseProject.TabIndex = 0;
            this.bBrowseProject.Text = "Browse Project";
            this.bBrowseProject.UseVisualStyleBackColor = true;
            this.bBrowseProject.Click += new System.EventHandler(this.bBrowseProject_Click);
            // 
            // bRunAnalysis
            // 
            this.bRunAnalysis.Location = new System.Drawing.Point(9, 55);
            this.bRunAnalysis.Margin = new System.Windows.Forms.Padding(2, 2, 2, 2);
            this.bRunAnalysis.Name = "bRunAnalysis";
            this.bRunAnalysis.Size = new System.Drawing.Size(165, 37);
            this.bRunAnalysis.TabIndex = 1;
            this.bRunAnalysis.Text = "Run Analysis";
            this.bRunAnalysis.UseVisualStyleBackColor = true;
            this.bRunAnalysis.Click += new System.EventHandler(this.bRunAnalysis_Click);
            // 
            // lFolderSelected
            // 
            this.lFolderSelected.AutoSize = true;
            this.lFolderSelected.Location = new System.Drawing.Point(139, 15);
            this.lFolderSelected.Margin = new System.Windows.Forms.Padding(2, 0, 2, 0);
            this.lFolderSelected.Name = "lFolderSelected";
            this.lFolderSelected.Size = new System.Drawing.Size(281, 13);
            this.lFolderSelected.TabIndex = 2;
            this.lFolderSelected.Text = "No folder selected (ex.: C:\\Apache24\\htdocs\\assets\\php)";
            // 
            // richTextBox1
            // 
            this.richTextBox1.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.richTextBox1.Location = new System.Drawing.Point(9, 113);
            this.richTextBox1.Margin = new System.Windows.Forms.Padding(2, 2, 2, 2);
            this.richTextBox1.Name = "richTextBox1";
            this.richTextBox1.Size = new System.Drawing.Size(872, 415);
            this.richTextBox1.TabIndex = 3;
            this.richTextBox1.Text = "";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(890, 537);
            this.Controls.Add(this.richTextBox1);
            this.Controls.Add(this.lFolderSelected);
            this.Controls.Add(this.bRunAnalysis);
            this.Controls.Add(this.bBrowseProject);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Margin = new System.Windows.Forms.Padding(2, 2, 2, 2);
            this.Name = "Form1";
            this.Text = "PHP Code Analyzer";
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

