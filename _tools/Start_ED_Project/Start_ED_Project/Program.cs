using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace Start_ED_Project
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Starting Apache...");
            System.Diagnostics.Process.Start(@"C:\Apache24\bin\httpd.exe");
            Console.WriteLine("Apache started!");
            Thread.Sleep(2000);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting local ED site...");
            System.Diagnostics.Process.Start("http://localhost:1180/");
            Console.WriteLine("Local ED site started!");
            Thread.Sleep(300);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting local phpMyAdmin...");
            System.Diagnostics.Process.Start("http://localhost:1180/myphpadmin/");
            Console.WriteLine("Local phpMyAdmin started! (root / c3x10 - for local)");
            Thread.Sleep(300);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting Meister Task...");
            System.Diagnostics.Process.Start("https://www.meistertask.com/app/dashboard");
            Console.WriteLine("Meister Task started!");
            Thread.Sleep(300);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting ED Google drive...");
            System.Diagnostics.Process.Start("https://drive.google.com/drive/u/0/my-drive");
            Console.WriteLine("ED Google drive started! (electrodeals.ro@gmail.ro / eD@2018)");
            Thread.Sleep(300);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting Project summary...");
            System.Diagnostics.Process.Start("https://docs.google.com/presentation/d/19AxGU6DRXbxiM2E36JL2vTOObYLE0xf9ZuimKq4MPaU/edit");
            Console.WriteLine("Project summary starte (GDrive -> stfn.ciobotaru@yahoo.com / ***");
            Thread.Sleep(300);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting GitHub...");
            System.Diagnostics.Process.Start("https://github.com/sciobotaru/htdocs");
            Console.WriteLine("GitHub started! (@yahoo / c3x10)");
            Thread.Sleep(300);
            Console.WriteLine("========================================================");

            Console.WriteLine("Starting VSCode...");
            System.Diagnostics.Process.Start(@"C:\Users\SCiobotaru\AppData\Local\Programs\Microsoft VS Code\Code.exe");
            Console.WriteLine("VSCode started!");

            Console.WriteLine("Pause 1 minute before closing");
            Thread.Sleep(60 * 1000);
        }
    }
}
