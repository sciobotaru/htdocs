using System;
using System.Drawing;
using System.IO;
using System.Windows.Forms;

namespace ImageCutter
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void bBrowse_Click(object sender, EventArgs e)
        {
            if(openFileDialog1.ShowDialog(this) == DialogResult.OK)
            {
                string fullName = openFileDialog1.FileName;
                string directory = Path.GetDirectoryName(fullName);
                string fileName = Path.GetFileNameWithoutExtension(fullName);
                Cutter cutter = new Cutter();
                Bitmap result = null;
                try
                {
                    result = cutter.Crop(fullName);
                }catch(Exception ex)
                {
                    MessageBox.Show(ex.Message);
                    return;
                }
                result.Save(Path.Combine(directory, fileName + "_cut.bmp"));
            }
        }
    }
}
