import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Barbearia } from './model/barbearia';

@Injectable({
  providedIn: 'root'
})
export class BarbeariaService {

apiUrl ='http://localhost/Sistema_barbearia/API/getuser/'

  constructor(private http: HttpClient) {
  }

  getUser(id){
   return this.http.get<any[]>(`${this.apiUrl}`)
  }
}
