//
//  SearchBox.swift
//  CheckInVN2
//
//  Created by PPPP on 14/02/2023.
//

import SwiftUI
import Combine

struct SearchBox: View {
    @StateObject var viewModel = ViewModel()
    @State private var searchText = ""
    @State private var filteredFamousPlaces: [Famous] = []
    var id_province: Int
    var body: some View {
        VStack {
            TextField("Search", text: $searchText)
                .padding(8)
                .background(Color(.systemGray6))
                .cornerRadius(8)
                .padding(.horizontal, 16)
            
            NavigationView {
                List {
                    ForEach(filteredFamousPlaces, id:\.id)
                    {
                        famous in
                        NavigationLink(
                            destination: FamousPlaceDetail(famousPlace: famous),
                            label: {
                                HStack {
                                    famous.imageName
                                        .resizable()
                                        .frame(width: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/, height: /*@START_MENU_TOKEN@*/100/*@END_MENU_TOKEN@*/)
                                    Text(famous.name)
                      
                                }
                            })
                    }
                    
                }
                .navigationTitle("Địa Danh")
                .onAppear{
                    viewModel.fetchFamousPost(with: id_province)
                }
            }
            
            .navigationBarTitleDisplayMode(.inline)
        }
        .onReceive(Just(searchText)) { searchText in
                if searchText.isEmpty {
                    filteredFamousPlaces = viewModel.coorFamous
                } else {
                    filteredFamousPlaces = viewModel.coorFamous.filter { famous in
                        famous.name.localizedCaseInsensitiveContains(searchText)
                    }
                }
        }
        .onAppear{
            viewModel.fetchFamous()
        }
    }
}

struct SearchBox_Previews: PreviewProvider {
    static var previews: some View {
        SearchBox(id_province: 1)
    }
}
