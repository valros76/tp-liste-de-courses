import MainNav from "../MainNav/MainNav";
import Logo from "/favicon.ico";

export default function Header(){
  return(
    <header className="main-head">
      <figure className="logo-header">
        <img src={Logo} alt="logo Food App" className="logo" width="32" height="32"/>
        <figcaption className="logo-title">
          <h1 className="main-head-title">
            Food App
          </h1>
        </figcaption>
      </figure>
      <MainNav/>
    </header>
  );
}