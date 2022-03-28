import { Injectable } from '@angular/core';
import { Client } from '../entities/client';
import { MiaBaseCrudHttpService } from '@agencycoda/mia-core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { MiaPagination } from '@agencycoda/mia-core';

@Injectable({
  providedIn: 'root'
})
export class ClientService extends MiaBaseCrudHttpService<Client> {

  constructor(
    protected http: HttpClient
  ) {
    super(http);
    this.basePathUrl = environment.baseUrl + 'client';
  }

  all(): Promise<MiaPagination<Client>>{
    return this.post(this.basePathUrl + '/list', {})
  }

  remove(itemId: number): Promise<boolean> {
    return this.delete(this.basePathUrl + '/remove/' + itemId)
  }
 
}