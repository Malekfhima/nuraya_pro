// Main JavaScript file for NURAYA website
document.addEventListener("DOMContentLoaded", function () {
  // Cart functionality
  let cart = JSON.parse(localStorage.getItem("nurayaCart")) || [];
  let cartCount = cart.reduce((total, item) => total + item.quantity, 0);

  // Update cart count display
  function updateCartCount() {
    const cartBtn = document.querySelector(".cart-btn");
    if (cartBtn) {
      cartBtn.setAttribute("data-count", cartCount);
      if (cartCount === 0) {
        cartBtn.style.setProperty("--show-count", "none");
      } else {
        cartBtn.style.setProperty("--show-count", "block");
      }
    }
  }

  // Add to cart functionality
  document.querySelectorAll(".add-to-cart-btn").forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();

      const productName = this.getAttribute("data-product");
      const productPrice = this.getAttribute("data-price");

      // Check if product already in cart
      const existingItem = cart.find((item) => item.name === productName);

      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cart.push({
          name: productName,
          price: productPrice,
          quantity: 1,
        });
      }

      cartCount++;
      updateCartCount();

      // Save to localStorage
      localStorage.setItem("nurayaCart", JSON.stringify(cart));

      // Show success message
      showNotification("Produit ajouté au panier!", "success");

      // Button animation
      this.innerHTML = '<i class="fas fa-check"></i> Ajouté!';
      this.style.backgroundColor = "#4CAF50";

      setTimeout(() => {
        this.innerHTML =
          '<i class="fas fa-shopping-cart"></i> Ajouter au panier';
        this.style.backgroundColor = "";
      }, 2000);
    });
  });

  // Smooth scrolling for navigation links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Search functionality
  const searchBtn = document.querySelector(".search-btn");
  if (searchBtn) {
    searchBtn.addEventListener("click", function (e) {
      e.preventDefault();
      showSearchModal();
    });
  }

  // Notification system
  function showNotification(message, type = "info") {
    const notification = document.createElement("div");
    notification.className = `notification ${type}`;
    notification.innerHTML = `
            <i class="fas fa-${
              type === "success" ? "check-circle" : "info-circle"
            }"></i>
            <span>${message}</span>
        `;

    notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            background: ${type === "success" ? "#4CAF50" : "#d697d7"};
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideInRight 0.3s ease-out;
            max-width: 300px;
        `;

    document.body.appendChild(notification);

    setTimeout(() => {
      notification.style.animation = "slideOutRight 0.3s ease-out";
      setTimeout(() => {
        document.body.removeChild(notification);
      }, 300);
    }, 3000);
  }

  // Search modal
  function showSearchModal() {
    const modal = document.createElement("div");
    modal.className = "search-modal";
    modal.innerHTML = `
            <div class="search-modal-content">
                <div class="search-header">
                    <h3>Rechercher un produit</h3>
                    <button class="close-search">&times;</button>
                </div>
                <div class="search-input-container">
                    <input type="text" placeholder="Rechercher..." class="search-input" autofocus>
                    <button class="search-submit"><i class="fas fa-search"></i></button>
                </div>
                <div class="search-results"></div>
            </div>
        `;

    modal.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        `;

    document.body.appendChild(modal);

    // Close modal
    const closeBtn = modal.querySelector(".close-search");
    closeBtn.addEventListener("click", () => {
      modal.style.animation = "fadeOut 0.3s ease-out";
      setTimeout(() => document.body.removeChild(modal), 300);
    });

    modal.addEventListener("click", (e) => {
      if (e.target === modal) {
        modal.style.animation = "fadeOut 0.3s ease-out";
        setTimeout(() => document.body.removeChild(modal), 300);
      }
    });

    // Focus search input
    const searchInput = modal.querySelector(".search-input");
    searchInput.focus();
  }

  // Parallax effect for hero section
  window.addEventListener("scroll", () => {
    const scrolled = window.pageYOffset;
    const heroImages = document.querySelectorAll(".hero-image");

    heroImages.forEach((image, index) => {
      const speed = index === 0 ? 0.5 : 0.3;
      image.style.transform = `translateY(${scrolled * speed}px)`;
    });
  });

  // Add loading animation for images
  document.querySelectorAll(".product-image").forEach((img) => {
    img.addEventListener("load", function () {
      this.style.animation = "fadeIn 0.5s ease-out";
    });
  });

  // Initialize cart count on page load
  updateCartCount();

  // Add CSS animations dynamically
  const style = document.createElement("style");
  style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOutRight {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .search-modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .search-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .search-header h3 {
            margin: 0;
            color: var(--text-dark);
        }
        
        .close-search {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-light);
        }
        
        .search-input-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .search-input {
            flex: 1;
            padding: 12px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 16px;
        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--accent-color);
        }
        
        .search-submit {
            padding: 12px 20px;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    `;
  document.head.appendChild(style);
});
