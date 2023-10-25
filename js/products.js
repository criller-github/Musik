export default class Products {
    constructor() {
        this.data = {
            password: "123"

        }

        this.rootElem = document.querySelector('.products');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');

    }

    async init(){

        this.nameSearch.addEventListener('input', () =>{
            // Delay
            if (this.searchTimeout) {
                clearTimeout(this.searchTimeout);
            }

            this.searchTimeout = setTimeout(() => {
                this.render();
            }, 300);
        });

        await this.render();
    }

    async render(){
        const data = await this.getData();

        const row = document.createElement('div');
        row.classList.add('row', 'g-4');

        for(const item of data){
            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');

            col.innerHTML = `
            <div class="card border-light">
                    <img src="uploads/${item.musOmslag}" class="card-img-top">
                <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                       <div class="row">
                          <div class="text-muted">
                             Sang:
                          </div>
                          <div>
                             <h5 class="text-muted">${item.musSangTitel}</h5>
                          </div>
                       </div>
                    </li>
                    <li class="list-group-item">
                       <div class="row">
                          <div class="text-muted">
                             Kunstner:
                          </div>
                          <div>
                             <h5 class="text-muted">${item.musKunstnerNavn}</h5>
                          </div>
                       </div>
                    </li>
                    <li class="list-group-item">
                       <div class="row">
                          <div class="text-muted">
                             Album:
                          </div>
                          <div>
                             <h5 class="text-muted">${item.musAlbumTitel}</h5>
                          </div>
                       </div>
                    </li>
                </ul>    
             
             <div class="card-footer" style="background-color: #2e323e">
                <a href="detail.php?musID=${item.musID}" class="stretched-link">
                    <h5 class="text-white text-center">
                        Se Produkt
                    </h5>
                </a>
             </div>
            </div>  
            </div>   

           `;

            row.appendChild(col);
        }

        this.items.innerHTML = '';

        this.items.appendChild(row)

    }

    async getData(){
        this.data.nameSearch = this.nameSearch.value;

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }
}