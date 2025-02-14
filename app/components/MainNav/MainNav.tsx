import { Link } from "react-router";

export default function MainNav() {


  const toggleMenu = (e:any) => {
    e.preventDefault();
    switch(e.target.dataset.state){
      case "close":

      break;
    }
  }

  return (
    <nav className="main-nav">
      <button
        className="nav-btn"
        data-state="close"
        onClick={toggleMenu}
      >
        <span className="nav-btn-icon-open">
          <i className="material-symbols-rounded">menu</i>
        </span>
        <span className="nav-btn-icon-close">❌</span>
      </button>
      <nav className="main-nav">
        <a
          href="/"
          className="main-menu-links"
        >
          Page d'accueil
        </a>
        <a
          href="/les-formules"
          className="main-menu-links"
        >
          Les formules
        </a>
        <a
          href="/les-projets"
          className="main-menu-links"
        >
          Les projets
        </a>
        <a
          href="/nous-contacter"
          className="main-menu-links"
        >
          Nous contacter
        </a>
        <a
          href="/rgpd"
          className="main-menu-links"
        >
          RGPD
        </a>
        <a
          href="/cgu-cgv"
          className="main-menu-links"
        >
          CGU & CGV
        </a>
        <a
          href="/mentions-legales"
          className="main-menu-links"
        >
          Mentions légales
        </a>
      </nav>
      <Link to="/">Accueil</Link>
      <Link to="/courses">Liste de courses</Link>
      <Link to="/courses/add">Ajouter</Link>
    </nav>
  );
}
