<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Entradas</title>
    <link rel="stylesheet" href="webSeguridad/app/assets/css/lista.css">
</head>
<body>
    <h1>Entradas Moma</h1>

    <div id="entryList"></div>

    <script>
        function generarEntradas() {
            const entryListElement = document.getElementById("entryList");
            const currentDate = new Date();
            
            for (let i = 0; i < 5; i++) {
                const nextMonth = new Date(currentDate);
                nextMonth.setMonth(currentDate.getMonth() + i);

                for (let day = 5; day <= 6; day++) {
                    const entryDate = new Date(nextMonth);
                    entryDate.setDate(entryDate.getDate() + (day - entryDate.getDay() + 7) % 7);

                    const entryDateString = entryDate.toLocaleDateString("es-ES", {
                        year: "numeric",
                        month: "long",
                        day: "numeric"
                    });

                    const dayOfWeek = obtenerDiaSemana(entryDate.getDay());

                    const entryElement = document.createElement("div");
                    entryElement.classList.add("entry");

                    const entryTitle = document.createElement("div");
                    entryTitle.innerText = "ENTRADA Moma";

                    const entryDateElement = document.createElement("div");
                    entryDateElement.classList.add("entry-date");
                    entryDateElement.innerText = entryDateString;

                    const dayOfWeekElement = document.createElement("div");
                    dayOfWeekElement.classList.add("day-of-week");
                    dayOfWeekElement.innerText = dayOfWeek;

                    const quantitySelector = document.createElement("div");
                    quantitySelector.classList.add("quantity-selector");

                    const quantityModifierMinus = document.createElement("div");
                    quantityModifierMinus.classList.add("quantity-modifier");
                    quantityModifierMinus.innerText = "-";
                    quantityModifierMinus.onclick = () => updateQuantity(-1, quantityCounter);

                    const quantityCounter = document.createElement("div");
                    quantityCounter.innerText = "0";

                    const quantityModifierPlus = document.createElement("div");
                    quantityModifierPlus.classList.add("quantity-modifier");
                    quantityModifierPlus.innerText = "+";
                    quantityModifierPlus.onclick = () => updateQuantity(1, quantityCounter);

                    quantitySelector.appendChild(quantityModifierMinus);
                    quantitySelector.appendChild(quantityCounter);
                    quantitySelector.appendChild(quantityModifierPlus);

                    entryElement.appendChild(entryTitle);
                    entryElement.appendChild(entryDateElement);
                    entryElement.appendChild(dayOfWeekElement);
                    entryElement.appendChild(quantitySelector);

                    entryListElement.appendChild(entryElement);
                }
            }
        }

        function updateQuantity(amount, counterElement) {
            let currentQuantity = parseInt(counterElement.innerText, 10);
            currentQuantity += amount;

            if (currentQuantity < 0) {
                currentQuantity = 0;
            }

            counterElement.innerText = currentQuantity.toString();
        }

        function obtenerDiaSemana(dia) {
            const diasSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
            return diasSemana[dia];
        }

        window.onload = generarEntradas;
    </script>
</body>
</html>
