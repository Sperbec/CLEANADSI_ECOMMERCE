export class search{
    constructor(myurlp, mysearchp, ul_add_lip) {
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ul_add_li = ul_add_lip;
        this.idli = "mylist";
        this.pcantidad = document.querySelector("#pcantidad");
    }

    InputSearch() {
        this.mysearch.addEventListener("input", (e) => {
            e.preventDefault();
            try {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
                let minimo_letras = 1; 
                let valor = this.mysearch.value;
                console.log(valor);


                if (valor.length > minimo_letras) {
                    let datasearh = new FormData();
                    datasearh.append("valor", valor);
                    fetch(this.url, {
                        headers: {
                        "X-CSRF-TOKEN": token,
                        },
                        method: "post",
                        body: datasearh,
                    })
                        .then((data) => data.json())
                        .then((data) => {
                            console.log("Success:", data);
                            //this.Showlist(data, valor);
                        })
                        .catch(function (error) {
                        console.error("Error:", error);
                        });
                    } else {
                    this.ul_add_li.style.display = "none";
                    }


            } catch (error) {}
            });
    }

}