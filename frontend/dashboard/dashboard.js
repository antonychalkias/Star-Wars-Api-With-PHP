$(document).ready(function () {
    fetchApiPlanets();
    fetchDbPlanets();
  
    $("#addPlanetForm").submit(function (event) {
        event.preventDefault();


        var formData = {
            planetName: $("#planetName").val(),
            rotationPeriod: $("#rotationPeriod").val(),
            orbitalPeriod: $("#orbitalPeriod").val(),
            diameter: $("#diameter").val(),
            climate: $("#climate").val(),
            gravity: $("#gravity").val()
        };

        $.ajax({
            type: "POST",
            url: "../../backend/api/add_planet.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    alert("Planet added successfully");
                    fetchDbPlanets();
                    $("#addPlanetModal").modal("hide");
                } else {
                    alert("Error adding planet: " + response.message);
                }
            },
            error: function () {
                console.log("Error adding planet. Please try again.");
            },
        });
    });

    $("#displayDbPlanetsModal").on("show.bs.modal", function (event) {

      fetchDbPlanetsInModal();
    });
  });
  
  function fetchDbPlanetsInModal() {
    $.ajax({
        type: "GET",
        url: "../../backend/api/get_planets.php",
        dataType: "json",
        success: function (response) {
            if (response.status === "success" && Array.isArray(response.planets)) {
                $("#dbPlanetTable tbody").empty();

                const planetsHtml = response.planets.map(planet => {
                    const { name, rotation_period, orbital_period, diameter, climate, gravity } = planet;
                    return `<tr>
                                <td>${name || ''}</td>
                                <td>${rotation_period || ''}</td>
                                <td>${orbital_period || ''}</td>
                                <td>${diameter || ''}</td>
                                <td>${climate || ''}</td>
                                <td>${gravity || ''}</td>
                            </tr>`;
                });

                $("#dbPlanetTable tbody").html(planetsHtml.join(''));
            } else {
                console.log("Invalid response format:", response);
            }
        },
        error: function () {
            console.log("Error fetching planets from the database. Please try again.");
        },
    });
}
  
  function fetchApiPlanets() {
    $.ajax({
      type: "GET",
      url: "https://swapi.dev/api/planets/",
      dataType: "json",
      success: function (response) {
        $("#apiPlanetTable tbody").empty();
        response.results.forEach(function (planet) {
          $("#apiPlanetTable tbody").append(
            "<tr>" +
              "<td>" + planet.name + "</td>" +
              "<td>" + planet.rotation_period + "</td>" +
              "<td>" + planet.orbital_period + "</td>" +
              "<td>" + planet.diameter + "</td>" +
              "<td>" + planet.climate + "</td>" +
              "<td>" + planet.gravity + "</td>" +
              "</tr>"
          );
        });
      },
      error: function () {
        console.log("Error fetching planets from API. Please try again.");
      },
    });
  }
  
function fetchDbPlanets() {
    $.ajax({
        type: "GET",
        url: "../../backend/api/get_planets.php",
        dataType: "json",
        success: function (response) {
            if (response.status === "success" && Array.isArray(response.planets)) {
                $("#dbPlanetTable tbody").empty();

                const planetsHtml = response.planets.map(planet => {
                    const { name, rotation_period, orbital_period, diameter, climate, gravity } = planet;
                    return `<tr>
                                <td>${name || ''}</td>
                                <td>${rotation_period || ''}</td>
                                <td>${orbital_period || ''}</td>
                                <td>${diameter || ''}</td>
                                <td>${climate || ''}</td>
                                <td>${gravity || ''}</td>
                            </tr>`;
                });

                $("#dbPlanetTable tbody").html(planetsHtml.join(''));
            } else {
                console.log("Invalid response format:", response);
            }
        },
        error: function () {
            console.log("Error fetching planets from the database. Please try again.");
        },
    });
}

$(document).ready(function () {
    $("#logoutBtn").click(function (event) {
        event.preventDefault();

        // Send a POST request to the logout API endpoint
        $.ajax({
            type: "POST",
            url: "../../backend/api/logout.php",
            data: { logout: true }, // Include the 'logout' parameter
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    // Redirect to the homepage after successful logout
                    window.location.href = response.redirect; // Use the provided redirect URL
                } else {
                    // Handle error if needed
                    console.log("Logout error:", response.message);
                }
            },
            error: function () {
                console.log("Error during logout. Please try again.");
            },
        });
    });
});