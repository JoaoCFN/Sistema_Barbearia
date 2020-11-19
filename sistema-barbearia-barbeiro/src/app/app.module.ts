import { MaterialModule } from './material/material.module';
import { MyBarbershopModule } from './my-barbershop/my-barbershop.module';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';


import { HomeComponentComponent } from './home-component/home-component.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { AppTitleComponent } from './app-title/app-title.component';
import { CardComponent } from './card/card.component';
import { HomeGraphicsComponent } from './home-graphics/home-graphics.component';
import { ChartsModule } from 'ng2-charts';





@NgModule({
  declarations: [
    AppComponent,
    HomeComponentComponent,
    SidebarComponent,
    HeaderComponent,
    FooterComponent,
    AppTitleComponent,
    CardComponent,
    HomeGraphicsComponent,
  ],
  imports: [

    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FontAwesomeModule,
    ChartsModule,
    FormsModule,
    MyBarbershopModule,
    MaterialModule,


  ],
  providers: [],
  bootstrap: [AppComponent],
  exports: [
  MaterialModule,
  ]
})
export class AppModule { }
