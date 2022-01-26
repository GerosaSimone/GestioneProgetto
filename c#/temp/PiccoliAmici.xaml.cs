using Microsoft.Win32;
using System;
using System.Collections.Generic;
using System.IO;
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
    public partial class PiccoliAmici : Window
    {
        HomePage home;
        Squadra squad;

        public PiccoliAmici()
        {
            InitializeComponent();
        }
        public PiccoliAmici(HomePage a)
        {
            InitializeComponent();
            home = a;
            squad=new Squadra();   
            squad.carica("PiccoliAmici");
            grid.ItemsSource = squad.getLista();
        }

        private void Window_Closed(object sender, EventArgs e)
        {
            this.Close();
            home.Show();
        }

        private void btnAggiungi_Click(object sender, RoutedEventArgs e)
        {

        }

        private void grid_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            SingoloGiocatore a = new SingoloGiocatore(squad.getGiocatore(grid.SelectedIndex),1,home);
            a.Show();
            this.Hide();
        }
    }
}
