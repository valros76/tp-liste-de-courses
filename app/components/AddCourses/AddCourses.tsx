import { useContext, useEffect, useState } from "react";
import { CoursesContext } from "~/shared/contexts/CoursesContext";

export default function AddCourses() {
  let { courses, addProductIntoList } =
    useContext(CoursesContext);

  let [product, setProduct] = useState("");

  const onSubmitAddForm = (e: any) => {
    e.preventDefault();
  };

  useEffect(() => {
    if (product) {
      console.log(product);
    }
  }, [product]);

  return (
    <form
      method="POST"
      onSubmit={onSubmitAddForm}
    >
      <p>
        Ajoutez vos produits à la liste de courses et
        enregistrez la quand elle est terminée.
      </p>
      <label htmlFor="list">Liste de courses</label>
      <input
        type="text"
        name="product"
        defaultValue={product}
        onChange={(e) => setProduct(e.target.value)}
      />
      <button onClick={() => addProductIntoList(product)}>
        Ajouter
      </button>
      {Object.entries(courses.list).length > 0 && (
        <ul>
          {courses.list.map((product: any) => (
            <li key={product}>{product}</li>
          ))}
        </ul>
      )}
      <input
        type="hidden"
        value={courses}
        name="list"
      />
      <button
        type="submit"
        className="cta-links"
        disabled={
          Object.entries(courses.list).length <= 0
            ? true
            : false
        }
      >
        Enregistrer
      </button>
    </form>
  );
}
