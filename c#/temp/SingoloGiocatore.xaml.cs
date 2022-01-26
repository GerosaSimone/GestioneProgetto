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
        int a;
        Giocatore giocatore;
        HomePage home;
        public SingoloGiocatore()
        {
            InitializeComponent();

        }
        public SingoloGiocatore(Giocatore g, int b, HomePage temp)
        {
            InitializeComponent();
            a = b;
            home = temp;
            giocatore = g;
            nome.Content = giocatore.nome;
            cognome.Content = giocatore.cognome;
            nascita.Content = giocatore.dataNascita.ToString("d");
            scadenza.Content = giocatore.scadenzaVisita.ToString("d");
            pagare.Content = giocatore.quotaDaPagare + " €";
            pagata.Content = giocatore.quotaPagata + " €";
            certificato.Source = new BitmapImage(new Uri(AppDomain.CurrentDomain.BaseDirectory + giocatore.linkVisita));
        }

        private void Window_Closed(object sender, EventArgs e)
        {
            if (a == 1)
            {
                PiccoliAmici a = new PiccoliAmici(home);
                a.Show();
                this.Hide();
            }else if (a == 2)
            {
                Pulcini a = new Pulcini(home);
                a.Show();
                this.Hide();
            }
            else if (a == 3)
            {
                Giovanissimi a = new Giovanissimi(home);
                a.Show();
                this.Hide();
            }
            else if (a == 4)
            {
                Esordienti a = new Esordienti(home);
                a.Show();
                this.Hide();
            }
            else if (a == 5)
            {
                Allievi a = new Allievi(home);
                a.Show();
                this.Hide();
            }
            else if (a == 6)
            {
                Jiuniores a = new Jiuniores(home);
                a.Show();
                this.Hide();
            }
            else if (a == 7)
            {
                PrimaSquadra a = new PrimaSquadra(home);
                a.Show();
                this.Hide();
            }
            this.Close();
        }
    }
}
