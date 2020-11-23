import { HomeComponent } from './home/home.component';
import { ServiceRegisterComponent } from './service-register/service-register.component';
import { ScheduleComponent } from './schedule/schedule.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponentComponent } from './home-component/home-component.component';
import { MyBarbershopComponent } from './my-barbershop/my-barbershop.component';


const routes: Routes = [
  {path:'' ,component:HomeComponent},
  {path:'dashboard' ,component:HomeComponentComponent},
  {path:'minha-barbearia' ,component:MyBarbershopComponent},
  {path:'servicos-agendados' ,component:ScheduleComponent},
  {path:'cadastrar-servicos' ,component:ServiceRegisterComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
