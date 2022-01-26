﻿using System;
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
    public partial class PrimaSquadra : Window
    {
        HomePage home;
        Squadra squad;

        public PrimaSquadra()
        {
            InitializeComponent();
        }
        public PrimaSquadra(HomePage a)
        {
            InitializeComponent();
            home = a;
            squad = new Squadra();
            squad.carica("PrimaSquadra");
            grid.ItemsSource = squad.getLista();
        }
        private void Window_Closed(object sender, EventArgs e)
        {
            this.Close();
            home.Show();
        }

        private void grid_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

        }

        private void btnAggiungi_Click(object sender, RoutedEventArgs e)
        {
            SingoloGiocatore a = new SingoloGiocatore(squad.getGiocatore(grid.SelectedIndex), 7, home);
            a.Show();
            this.Hide();
        }
    }
}