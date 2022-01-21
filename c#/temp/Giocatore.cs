using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace temp
{
    public class Giocatore
    {
        public string nome { get; set; }
        public string cognome { get; set; }
        public DateTime dataNascita { get; set; }
        public string linkVisita { get; set; }
        public DateTime scadenzaVisita { get; set; }
        public int quotaDaPagare { get; set; }
        public int quotaPagata { get; set; }
        public Giocatore()
        {
            nome = "";
            cognome = "";
            dataNascita = new DateTime();
            linkVisita = "";
            scadenzaVisita = new DateTime();
            quotaDaPagare = 0;
            quotaPagata = 0;
        }
        public void fromCSV(string s)
        {
            string[] vet = s.Split(';');
            nome = vet[0];
            cognome = vet[1];
            dataNascita = Convert.ToDateTime(vet[2]);
            linkVisita = vet[3];
            scadenzaVisita = Convert.ToDateTime(vet[4]);
            quotaDaPagare = Convert.ToInt32(vet[5]);
            quotaPagata = Convert.ToInt32(vet[6]);
        }
        public string toCSV()
        {
            return nome + ";" + cognome + ";" + dataNascita.ToString("d") + ";" + linkVisita + ";" + scadenzaVisita.ToString("d") + ";" + quotaDaPagare + ";" + quotaPagata + "\n";
        }
    }
}
