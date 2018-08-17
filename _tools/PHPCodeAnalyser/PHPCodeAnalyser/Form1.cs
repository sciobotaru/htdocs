using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Windows.Forms;

namespace PHPCodeAnalyser
{
    public partial class Form1 : Form
    {
        private string selectedPath;

        public Form1()
        {
            InitializeComponent();
        }

        private void bBrowseProject_Click(object sender, EventArgs e)
        {
            using (var fbd = new FolderBrowserDialog())
            {
                if (Properties.Settings.Default.lastpath != string.Empty)
                {
                    fbd.SelectedPath = selectedPath;
                }

                DialogResult result = fbd.ShowDialog();

                if (result == DialogResult.OK)
                {
                    selectedPath = fbd.SelectedPath;
                    lFolderSelected.Text = selectedPath;
                    Properties.Settings.Default.lastpath = selectedPath;
                    Properties.Settings.Default.Save();
                }
            }
        }

        private void bRunAnalysis_Click(object sender, EventArgs e)
        {
            if (string.IsNullOrEmpty(selectedPath)) return;

            string[] folders = Directory.GetDirectories(selectedPath, "*", SearchOption.AllDirectories);

            List<string> phpFiles = new List<string>();

            foreach(string path in folders)
            {
                phpFiles.AddRange(Directory.GetFiles(path, "*.php").ToList());
            }

            Business business = new Business();
            string structure =  business.GetStructure(phpFiles);
            string report = business.GetReport();
            richTextBox1.Text = structure + "\n" + 
                                "------------------  REPORT   ----------------------\n\n" +
                                report + "\n\n";
        }
    }
}
