
var search = document.getElementById('pesquisar');

search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") 
    {
        searchData();
    }
});

function searchData()
{
    window.location = 'sistema.php?search='+search.value;
}
/////////////////////////////////////////////////
(function () {
   var decodeHtmlEntity = function(str) {
      var txt = document.createElement("textarea");
      txt.innerHTML = str;
      return txt.value;
   };

   var handleTableSort = function() {
      var table = document.querySelector('.table');
      var headers = table.querySelectorAll('th[scope="col"] a');
      
      headers.forEach(function(header) {
         header.addEventListener('click', function() {
            var rows = Array.from(table.querySelectorAll('tbody tr'));
            var columnIndex = Array.from(header.parentNode.parentNode.children).indexOf(header.parentNode);
            var dataType = header.getAttribute('data-type') || ''; // adicionado suporte para tipos de dados numéricos
            var order = (header.getAttribute('data-order') || 'asc').toLowerCase();
            
            rows.sort(function(a, b) {
               var valueA = decodeHtmlEntity(a.children[columnIndex].innerText);
               var valueB = decodeHtmlEntity(b.children[columnIndex].innerText);
               
               if(dataType === 'numeric') {
                  valueA = parseFloat(valueA.replace(',', '.'));
                  valueB = parseFloat(valueB.replace(',', '.'));
               } else if (dataType === 'alphabetic') { // Adicionado suporte para ordenação alfabética
                  valueA = valueA.toLowerCase();
                  valueB = valueB.toLowerCase();
               }
               
               // Calcular a pontuação total se a coluna for "Pontuação Total"
               if (header.innerText.trim() === 'Pontuação Total') {
                   var damaA = parseFloat(decodeHtmlEntity(a.children[2].innerText));
                   var respostaA = parseFloat(decodeHtmlEntity(a.children[3].innerText));
                   var totalA = damaA + respostaA;
                   
                   var damaB = parseFloat(decodeHtmlEntity(b.children[2].innerText));
                   var respostaB = parseFloat(decodeHtmlEntity(b.children[3].innerText));
                   var totalB = damaB + respostaB;
                   
                   valueA = totalA;
                   valueB = totalB;
               }
               
                
               if(valueA < valueB) {
                  return order === 'asc' ? -1 : 1;
               }
               
               if(valueA > valueB) {
                  return order === 'asc' ? 1 : -1;
               }
               
               return 0;
            });
            
            rows.forEach(function(row) {
               row.parentNode.appendChild(row);
            });
            
            header.setAttribute('data-order', order === 'asc' ? 'desc' : 'asc');
         });
      });
   };

   handleTableSort();
})();
