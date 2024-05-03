// ---------------------------
// Main File of Account System v2.0
// Copyright WAWAWOGO Studios.
// ---------------------------

// Reusable fetch function
async function fetchData(url, options) {
    try {
      const response = await fetch(url, options);
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return await response.json();
    } catch (error) {
      console.error("There was a problem with your fetch operation:", error);
      throw error;
    }
  }
  
  // Function to verify token
  async function verifyToken(token) {
    const url = "https://api.scamcraft.net/auth/tokenlogin";
    const options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ token })
    };
  
    try {
      const data = await fetchData(url, options);
      return data.username;
    } catch (error) {
      throw error;
    }
  }
  
  // Function to get snake score
  async function getSnakeScore(token) {
    const url = "https://api.scamcraft.net/auth/getscore";
    const options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ token })
    };
  
    try {
      const data = await fetchData(url, options);
      return data.score;
    } catch (error) {
      throw error;
    }
  }
  
  // Function to set snake score
  async function setSnakeScore(token, score) {
    const url = "https://api.scamcraft.net/auth/setscore";
    const options = {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ token, score })
    };
  
    try {
      const data = await fetchData(url, options);
      return data.score;
    } catch (error) {
      throw error;
    }
  }
  
  // Main function
  window.onload = async function () {
    const token = localStorage.getItem("token");
    if (!token) {
      alert("Not Logged into mcdonelts.city!");
      window.location.href = "/login.html";
      return;
    }
  
    try {
      const username = await verifyToken(token);
      document.getElementById("usergreet").textContent = `Hiya! ${username}!`;
      const score = await getSnakeScore(token);
      document.getElementById("highscore").textContent = `Highscore: ${score}`;
      localStorage.setItem("accountscore", score);
    } catch (error) {
      console.error(error);
      // Show error message on webpage
      document.getElementById("error").textContent = "An error occurred. Please try again later.";
      localStorage.removeItem("token");
      window.location.href = "login.html";
    }
  };
  
  // Example usage of setSnakeScore function
  const token = localStorage.getItem("token");
  const newhighscore = localStorage.getItem("newhighscore");
  const overridepermitted = localStorage.getItem("gameover");
  
  try {
    if (overridepermitted === "true") {
      localStorage.setItem("gameover", "false");
      await setSnakeScore(token, newhighscore);
      console.log("Score successfully set!");
    } else {
      console.log("Score Override Not Permitted :(");
    }
  } catch (error) {
    console.error("Failed to set score:", error);
    // Show error message on webpage
    document.getElementById("error").textContent = "Failed to set score.";
  }