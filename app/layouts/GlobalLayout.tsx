import { Outlet } from "react-router";
import Footer from "~/components/Footer/Footer";
import Header from "~/components/Header/Header";
import CoursesProvider from "~/shared/contexts/CoursesContext";

export default function GlobalLayout() {
  return (
    <>
      <Header />
      <main className="main-content">
        <CoursesProvider children={<Outlet />} />
      </main>
      <Footer />
    </>
  );
}
