import { createContext } from "react";
import { apiRoutes } from "../utlis/api";
export const ProjectContext = createContext();

const ProjectProvider = ({children})=>{

    const addProject =   (data) =>{
        const result =   apiRoutes({
            route:"project/store",
            method:"POST",
            body:data,
        })
    }
    const editProject =   (data) =>{
        const result =   apiRoutes({
            route:"project/addInstructor",
            method:"POST",
            body:data,
        })
    }

    return (
        <ProjectContext.Provider
        value={{
            addProject,
            editProject,
        }}
        >

            {children}

        </ProjectContext.Provider>
    )

}


export default ProjectProvider;
