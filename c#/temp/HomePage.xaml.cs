using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace temp
{
    public partial class HomePage : Window
    {
        public HomePage()
        {
            InitializeComponent();
        }

        private void btnAmici_Click(object sender, RoutedEventArgs e)
        {
            PiccoliAmici a = new PiccoliAmici(this);
            a.Show();
            this.Hide();
        }

        private void btnPulcini_Click(object sender, RoutedEventArgs e)
        {
            Pulcini a = new Pulcini(this);
            a.Show();
            this.Hide();
        }

        private void btnGiovanissimi_Click(object sender, RoutedEventArgs e)
        {
            Giovanissimi a = new Giovanissimi(this);
            a.Show();
            this.Hide();
        }

        private void btnEsordienti_Click(object sender, RoutedEventArgs e)
        {
            Esordienti a = new Esordienti(this);
            a.Show();
            this.Hide();
        }

        private void btnAllievi_Click(object sender, RoutedEventArgs e)
        {
            Allievi a = new Allievi(this);
            a.Show();
            this.Hide();
        }

        private void btnJiuniores_Click(object sender, RoutedEventArgs e)
        {
            Jiuniores a = new Jiuniores(this);
            a.Show();
            this.Hide();
        }

        private void btnPrima_Click(object sender, RoutedEventArgs e)
        {
            PrimaSquadra a = new PrimaSquadra(this);
            a.Show();
            this.Hide();
        }

        private void btnCalendario_Click(object sender, RoutedEventArgs e)
        {
            CalendarioCampo a = new CalendarioCampo();
            a.Show();
            this.Hide();
        }

        private void btnMateriali_Click(object sender, RoutedEventArgs e)
        {
            Materiali a = new Materiali();
            a.Show();
            this.Hide();
        }

        private void btnSpese_Click(object sender, RoutedEventArgs e)
        {
            ResocontoSpese a = new ResocontoSpese();
            a.Show();
            this.Hide();
        }
    }
}
