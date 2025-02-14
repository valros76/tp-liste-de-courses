import { useEffect, useState } from "react";
import { Link } from "react-router";

export default function MainNav() {
  let [isVisible, setIsVisible] = useState(false);
  let [dataState, setDataState] = useState<
    "open" | "close"
  >("close");

  useEffect(() => {
    if (dataState === "open") {
      setIsVisible(true);
    } else {
      setIsVisible(false);
    }
  }, [dataState]);

  const toggleMenu = (e: any) => {
    e.preventDefault();
    setDataState((dataState) =>
      dataState === "open" ? "close" : "open"
    );
    e.stopPropagation();
  };

  return (
    <>
      <button
        className="nav-btn"
        data-state={dataState}
        onClick={toggleMenu}
      >
        {dataState === "open" ? (
          <span className={`nav-btn-icon-close`}>❌</span>
        ) : (
          <span className={`nav-btn-icon-open`}>
            <i className="material-symbols-rounded">menu</i>
          </span>
        )}
      </button>
      <nav
        className={`main-nav ${
          dataState === "open" && isVisible ? "visible" : ""
        }`}
      >
        <Link
          to="/"
          className="main-menu-links"
        >
          Accueil
        </Link>
        <Link
          to="/courses"
          className="main-menu-links"
        >
          Liste de courses
        </Link>
        <Link
          to="/courses/add"
          className="main-menu-links"
        >
          Ajouter
        </Link>
      </nav>
    </>
  );
}
