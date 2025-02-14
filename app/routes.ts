import { type RouteConfig, index, layout, prefix, route } from "@react-router/dev/routes";

export default [
  layout("layouts/GlobalLayout.tsx" , [
    index("routes/home.tsx"),
    ...prefix("courses", [
      index("routes/Courses.tsx"),
      route("add", "routes/AddCoursesList.tsx"),
      route("update", "routes/UpdateCoursesList.tsx"),
    ])
  ])
] satisfies RouteConfig;
