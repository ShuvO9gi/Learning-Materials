class MyHeader extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <header>
        <div style="background-color: antiquewhite; height: 100px">
        <div style="float: left">Branding</div>
        <div style="text-align: center; font-size: 20px">This is a header part</div>
        <div style="float: right">
            <a href="index.html">Home Page</a>
            <a href="contact.html">Contact</a>
            <a href="about.html">About</a>
        </div>
        </div>
    </header>
    `;
  }
}

customElements.define("my-header", MyHeader);

class MyFooter extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
        <footer>
            <div
            style="
                background-color: brown;
                height: 200px;
                color: aliceblue;
                text-align: center;
                font-size: 36px;
                padding-top: 80px;
            "
            >
            @2023 Copyright.
            </div>
        </footer>
        `;
  }
}

customElements.define("custom-footer", MyFooter);
