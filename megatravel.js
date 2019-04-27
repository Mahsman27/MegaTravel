const cities = {
    Brisbane: ["City Tours", "Sports", "Cycling", "Museums", "Boating"],
    Vancouver: ["Sailing", "Beach", "Hiking", "Museums", "Boating"],
    New_York_City: ["Museums", "Theatre", "Parks and Recreation", "City Tours"],
    Berlin: ["City Tours", "Museums", "Cycling"],
    Cancun: ["Parks and Recreation", "Beaches", "Boating", "Snorkeling"]
  };

  function activitiesSelect(e) {
    const { value: city } = e.target;
    const values = cities[city];
  
    $("#activity")
      .find("option")
      .remove()
      .end()
      .append('<option value="none" disabled selected>Select</option>')
      .val("none");
  
    for (let i = 0; i < values.length; i++) {
      var o = new Option(values[i], values[i]);
      $(o).html(values[i]);
      $("#activity").append(o);
    }
  }
  
  document.getElementById("city").addEventListener("change", activitiesSelect);
