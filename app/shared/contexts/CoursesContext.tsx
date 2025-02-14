import { createContext, useEffect, useState } from "react";
import type { CoursesI } from "../interfaces/Courses.interface";

export const CoursesContext = createContext<any>({});

export default function CoursesProvider({ children }: any) {
  const [courses, setCourses] = useState<CoursesI>({
    id: undefined,
    list:[],
    budget:0,
    creation_date: undefined,
    modification_date:undefined
  });

  const addProductIntoList = (product: string) => {
    setCourses(courses => {
      courses.list = [
        ...courses.list,
        product
      ];

      return courses;
    });
  }

  return (
    <CoursesContext.Provider
      value={{
        courses,
        setCourses,
        addProductIntoList
      }}
    >
      {children}
    </CoursesContext.Provider>
  );
}
