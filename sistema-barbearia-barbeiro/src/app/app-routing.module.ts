import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponentComponent } from './home-component/home-component.component';
import { MyBarbershopComponent } from './my-barbershop/my-barbershop.component';


const routes: Routes = [
  {path:'' ,component:HomeComponentComponent},
  {path:'minha-barbearia' ,component:MyBarbershopComponent},
  //{path:'' ,component:HomeComponentComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
