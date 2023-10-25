export default class Prom{
    constructor() {
    }

    async kageEllerHvad(){
        try{
            const responseKage = await this.skalKimGiveKage(true);
            console.log(responseKage);

            const responseSize = await this.erDetEnStorKage('large');
            console.log(responseSize);
        }catch (error){
            console.log(error);
        }


}


    skalKimGiveKage(erKimKommetForSent){
        return new Promise((resolve, reject) => {

            setTimeout(() => {
                if (erKimKommetForSent){
                    resolve('Kim giver kage');
                }else {
                    reject('Ingen kage i dag');
                }
            }, 1000);

        });
    }

    erDetEnStorKage(size){
        return new Promise((resolve, reject) => {
            setTimeout(() => {

                if(size === 'small'){
                    reject('Nej, det er en lille kage');
                }else if(size === 'medium'){
                    reject('ikke stor nok');
                }else{
                    resolve('yeps');
                }

            }, 1000);
        });
    }

}