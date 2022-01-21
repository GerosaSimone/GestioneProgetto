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
    public partial class SingoloGiocatore : Window
    {
        Giocatore giocatore;
        public SingoloGiocatore()
        {
            InitializeComponent();
        }
        public SingoloGiocatore(Giocatore g)
        {
            InitializeComponent();
            giocatore = g;
            nome.Content = giocatore.nome;
            cognome.Content = giocatore.cognome;
            nascita.Content = giocatore.dataNascita.ToString("d");
            scadenza.Content = giocatore.scadenzaVisita.ToString("d");
            pagare.Content = giocatore.quotaDaPagare + " €";
            pagata.Content = giocatore.quotaPagata + " €";
            certificato.Source = new BitmapImage(new Uri(AppDomain.CurrentDomain.BaseDirectory + giocatore.linkVisita));
        }

    }
}
