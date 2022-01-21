using Microsoft.Win32;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace temp
{
    public class Squadra
    {
        public List<Giocatore> squadra;
        public Squadra() => this.squadra = new List<Giocatore>();
        public void setGiocatore(Giocatore p) => squadra.Add(p);
        public Giocatore getGiocatore(int pos) { return squadra[pos]; }
        public List<Giocatore> getLista() { return squadra; }
        public void carica(string path)
        {
            OpenFileDialog file = new OpenFileDialog();
            using (StreamReader sr = File.OpenText(AppDomain.CurrentDomain.BaseDirectory + "\\" + "squadre" + "\\" + path + ".txt"))
            {
                string s = "";
                while ((s = sr.ReadLine()) != null)
                {
                    Giocatore temp = new Giocatore();
                    temp.fromCSV(s);
                    this.setGiocatore(temp);
                }
            }
        }
    }
}
