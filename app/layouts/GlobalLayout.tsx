import { Outlet } from "react-router";
import Footer from "~/components/Footer/Footer";
import Header from "~/components/Header/Header";


export default function GlobalLayout(){
  return(
    <>
      <Header/>
      <main className="main-content">
      <Outlet/>
      </main>
      <Footer/>
    </>
  );
}