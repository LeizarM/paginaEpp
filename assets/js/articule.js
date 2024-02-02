document.getElementById('myInput').addEventListener('input', function() {
    var filter = this.value.toLowerCase();
    var nodes = document.querySelectorAll('#myList .col-md-6');
    var visibleCount = 0;

    nodes.forEach(function(node) {
        if (node.textContent.toLowerCase().includes(filter)) {
            node.style.display = '';
            // Recalcular la posición basado en la cantidad visible
            var topPosition = Math.floor(visibleCount / 3) * 100.5; // Ajusta 100.5 según el alto de tus elementos
            var leftPosition = (visibleCount % 3) * 380; // Ajusta 380 según el ancho de tus elementos
            node.style.top = topPosition + 'px';
            node.style.left = leftPosition + 'px';
            visibleCount++;
        } else {
            node.style.display = 'none';
        }
    });
});