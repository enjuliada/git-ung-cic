
public class Carros {

    //Atributos da classe (OFICIAIS)
    private String modelo;
    private int velMaxima;
    private float potencia, distancia, velAtual;

    //Método Construtor
    public Carros(String tmpModelo, int tmpVelMaxima, float tmpPotencia) {
        this.modelo = tmpModelo;
        this.velMaxima = tmpVelMaxima;
        this.potencia = tmpPotencia;
        this.distancia = 0;
        this.velAtual = 0;
    }

//Métodos Funcionais    
    public void parar() {
        this.velAtual = 0;
    }

    public float acelerar(int tmpAcel) {

        if ((this.velAtual + tmpAcel) <= this.velMaxima) {
            this.velAtual += tmpAcel;
        } else {
            this.velAtual = this.velMaxima;
        }
        this.distancia += this.velAtual * this.potencia;
        return this.velAtual;
    }
    
    public String verModelo(){
        return this.modelo;
    }
    
    public float verDistancia(){
        return this.distancia;
    }

}//fechando class
