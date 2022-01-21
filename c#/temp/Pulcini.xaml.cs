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
    public partial class Pulcini : Window
    {
        HomePage home;
        Squadra squad;
        public Pulcini()
        {
            InitializeComponent();
        }
        public Pulcini(HomePage a)
        {
            InitializeComponent();
            home = a;
            squad = new Squadra();
            squad.carica("Pulcini");
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
            SingoloGiocatore a = new SingoloGiocatore(squad.getGiocatore(grid.SelectedIndex));
            a.Show();
            this.Hide();
        }
    }
}
