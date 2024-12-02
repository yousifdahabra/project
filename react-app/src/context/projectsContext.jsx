import { createContext } from "react";
import { apiRoutes } from "../utlis/api";
export const ProjectContext = createContext();

const ProjectProvider = ({children})=>{

    const addProject =  async (data) =>{
        try{
            const respons = await axios.request({
                url:'http://localhost:8000/project/store',
                method : 'POST',
                data:data,
                headers:{
                    'Content-Type': 'application/json',
                }
            });
            return respons.data;
    
        }catch (error){
            return error;
        }
    
    }
    const editProject = async  (data) =>{
        try{
            const respons = await axios.request({
                url:'http://localhost:8000/project/',
                method : 'PUT',
                data:data,
                headers:{
                    'Content-Type': 'application/json',
                }
            });
            return respons.data;
    
        }catch (error){
            return error;
        }
    }
    const deleteProject = async  (data) =>{
        try{
            const respons = await axios.request({
                url:'http://localhost:8000/project/',
                method : 'DELETE',
                data:data,
                headers:{
                    'Content-Type': 'application/json',
                }
            });
            return respons.data;
    
        }catch (error){
            return error;
        }
    }

    return (
        <ProjectContext.Provider
        value={{
            addProject,
            editProject,
            deleteProject,
        }}
        >

            {children}

        </ProjectContext.Provider>
    )

}


export default ProjectProvider;
