class MobileMenu {
  constructor() {
    this.toggler = document.querySelector(".fa-bars");
    this.menu = document.querySelector(".site-header__menu");
    this.events();
  }

  events() {
    this.toggler.addEventListener("click", () => this.toggleMenu());
  }

  toggleMenu() {
    if (this.menu.classList.contains("hidden")) {
      this.menu.classList.remove("hidden");
    } else {
      this.menu.classList.add("hidden");
    }
  }
}

class MobileFooter {
  constructor() {
    this.togglers = document.querySelectorAll(".site-footer__item-toggler");
    this.collapseContent = document.querySelectorAll(
      ".site-footer__item-collapse"
    );
    this.events();
  }

  events() {
    this.togglers.forEach((toggler) =>
      toggler.addEventListener("click", () => this.toggleContent(toggler))
    );
  }

  toggleContent(toggler) {
    toggler.style.display = "none";
    const togglers = toggler.parentElement;
    const header = togglers.parentElement;
    const collapseContent = header.nextElementSibling;

    if (toggler.classList.contains("fa-plus")) {
      collapseContent.style.display = "block";
      toggler.nextElementSibling.style.display = "inline-block";
    } else {
      collapseContent.style.display = "none";
      toggler.previousElementSibling.style.display = "inline-block";
    }
  }
}

class Search {
  constructor() {
    this.addSearchHTML();
    this.resultsDiv = document.querySelector(".search-overlay__results");
    this.openButtons = document.querySelectorAll(".fa-search");
    this.closeButton = document.querySelector(".search-overlay__close");
    this.searchOverlay = document.querySelector(".search-overlay");
    this.searchField = document.querySelector("#search-term");
    this.events();
    this.isOverlayOpen = false;
    this.previousValue;
    this.typingTimer;
  }

  events() {
    this.openButtons.forEach((openButton) =>
      openButton.addEventListener("click", () => this.openOverlay())
    );
    this.closeButton.addEventListener("click", () => this.closeOverlay());
    document.addEventListener("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.addEventListener("keyup", () => this.typingLogic());
  }

  typingLogic() {
    if (this.searchField.value !== this.previousValue) {
      clearTimeout(this.typingTimer);

      if (this.searchField.value) {
        this.typingTimer = setTimeout(() => this.getResults(), 750);
      } else {
        this.resultsDiv.innerHTML = "";
      }
    }

    this.previousValue = this.searchField.value;
  }

  async getResults() {
    const responses = await fetch(
      `${shopData.root_url}/wp-json/shop/v1/search?term=${this.searchField.value}`
    );
    const results = await responses.json();
    this.resultsDiv.innerHTML = `
        <div class="row">
          <div class="one-half">
            <h2 class="search-overlay__section-title">General Information</h2>
            ${
              results.generalInfo.length
                ? "<ul>"
                : "<p>No general information matches that search.</p>"
            }
              ${results.generalInfo
                .map(
                  (item) =>
                    `<li><a href="${item.permalink}">${item.title}</a> ${
                      item.postType === "post" ? `by ${item.authorName}` : ""
                    }</li>`
                )
                .join("")}
            ${results.generalInfo.length ? "</ul>" : ""}
          </div>
          <div class="one-half">
            <h2 class="search-overlay__section-title">Coffee</h2>
            ${
              results.coffee.length
                ? "<ul>"
                : `<p>No coffee matches that search. <a href="${shopData.root_url}">View all coffee</a></p>`
            }
              ${results.coffee
                .map(
                  (item) => `
                <li>
                  <a class="search-result__coffee" href="${item.permalink}">
                    <img src="${item.image}">
                    <span>${item.title}</span>
                  </a>
                </li>
              `
                )
                .join("")}
            ${results.coffee.length ? "</ul>" : ""}
          </div>
          </div>
        </div>
      `;
  }

  keyPressDispatcher(e) {
    if (
      e.keyCode === 83 &&
      !this.isOverlayOpen &&
      document.querySelector("input") !== document.activeElement &&
      document.querySelector("textarea") !== document.activeElement
    ) {
      this.openOverlay();
    }

    if (e.keyCode === 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active");
    this.searchField.value = "";
    this.searchField.focus();
    this.isOverlayOpen = true;
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active");
    this.isOverlayOpen = false;
  }

  addSearchHTML() {
    document.querySelector("body").insertAdjacentHTML(
      "beforeend",
      `
      <div class="search-overlay">
        <div class="container">
          <div class="search-overlay__top">
            <i class="fa fa-search search-overlay__icon fa-lg" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="Search the store" id="search-term"> 
            <i class="fa fa-times search-overlay__close fa-lg" aria-hidden="true"></i>
          </div>

          <div class="search-overlay__results"></div>
        </div>
      </div>
    `
    );
  }
}

const mobileMenu = new MobileMenu();
const mobileFooter = new MobileFooter();
const search = new Search();

jQuery(document).ready(function () {
  jQuery(".hero-slider").slick({
    autoplay: true,
  });

  jQuery(".product-slider").slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });

  jQuery(".post-slider").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 600, 
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
});
