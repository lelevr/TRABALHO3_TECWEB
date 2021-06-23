let lista = [
    {
  "nome": "computador1",
  "valor":"500",
  "description":"Lindo computador"
  },
    {
  "nome": "monitor",
  "valor":"600",
  "description":"Lindo monitor"
  },
    {
  "nome": "cadeira",
  "valor":"700",
  "description":"Cadeirad e buteco gamer"
  
  },
  
  
  ];
  
  //https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Global_Objects/String/includes
  search(null);
  
  console.log(lista);
   
  function search(value) {
    let html='';
    nome=document.getElementById("termo").value;
  
    lista.forEach( (item) => {
      if (item.nome.toLowerCase().includes(nome.toLowerCase())) {
  
        html +='<div class="card" style="width: 18rem;">';
        html +='<div class="card-body">';
        html +='<h5 class="card-title">'+item.nome+'</h5>';
        html +='<h6 class="card-subtitle mb-2 text-muted">';
        html +='Valor:'+item.valor+'</h6>';
        html +='<p class="card-text">'+item.description;
        html +='</p>';
        html +='<a href="#" class="card-link">Card link</a>';
        html +='<a href="#" class="card-link">Another link</a>';
        html +='</div>';
        html +='</div> <br>';
  
      }
      
    });
  
  
    document.getElementById("resultado").innerHTML = html;
  
  }
  