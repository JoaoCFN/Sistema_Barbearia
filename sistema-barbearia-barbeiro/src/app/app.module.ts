import { ServiceCardListModule } from './service-card-list/service-card-list.module';
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

@NgModule({
  declarations: [
    AppComponent,
    HomeComponentComponent,
    SidebarComponent,
    HeaderComponent,
    FooterComponent,
    AppTitleComponent,


  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FontAwesomeModule,
    ServiceCardListModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
